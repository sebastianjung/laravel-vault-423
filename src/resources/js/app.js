import Vue from 'vue';
require('es6-promise').polyfill();
import axios from 'axios';
import { TimelineMax, Linear, Ease, Power3 } from 'gsap';
import Typewriter from 'typewriter-effect/dist/core';

var app = new Vue({
    el: '#vault-423',
    data: {
        password: '',
        isPasswordIncorrect: false,
        isInputReady: false,
        timelines: {
            morphLockToInput: new TimelineMax(),
            shrinkInputField: new TimelineMax(),
            rotateLock: new TimelineMax(),
            showError: new TimelineMax(),
            showSuccess: new TimelineMax(),
            bounceLock: new TimelineMax()
        },
        typewriterTextPartOne: '',
        typewriterTextPartTwo: []
    },
    mounted() {
        this.initAnimations();
        this.initTypewriter();

        if (!this.checkForIE()) { // set autofocus already onload for faster typing (not for IE)
            this.setFocus();
        }
    },
    methods: {
        checkForIE() {
            var rV = -1; // Return value assumes failure.

            if (navigator.appName == 'Microsoft Internet Explorer' || navigator.appName == 'Netscape') {
                var uA = navigator.userAgent;
                var rE = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");

                if (rE.exec(uA) != null) {
                    rV = parseFloat(RegExp.$1);
                }
                /*check for IE 11*/
                else if (!!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                    rV = 11;
                }
            }
            
            if (rV != -1) {
                return true;
            }

            return false;
        },
        removePasswordIncorrectWarning() {
            if (this.isPasswordIncorrect) {
                this.timelines.showError.reverse();
            }
        },
        submit(goToUrl, isClicked) {
            if (isClicked && !this.isInputReady) {
                this.timelines.bounceLock.play();
                console.log('clicked but not ready');
                return;
            }

            this.goToUrl = goToUrl;

            // ANIMATIONS
            if (this.isPasswordIncorrect) { // if password has been input incorrectly before
                this.timelines.showError.reverse();
            }
            this.timelines.shrinkInputField.play();
            this.timelines.rotateLock.play();

            // POST REQUEST
            axios
                .post('/vault-423/check-password', {
                    'vault-423-password': this.password
                })
                .then((response) => {
                    let waitTime = this.isPasswordIncorrect ? 1000 : 400; // if password was incorrect we first need to remove the password warning before the next animation is played
                    if (response.status == 200) {
                        this.setCookieForever('vault-423', this.password);
                        setTimeout(() => {
                            this.isPasswordIncorrect = false;
                            this.timelines.showSuccess.play();
                        }, waitTime);
                    }
                })
                .catch((response) => {
                    setTimeout(() => {
                        this.isPasswordIncorrect = true;
                        this.timelines.shrinkInputField.reverse();
                        this.timelines.rotateLock.stop();
                        setTimeout(() => {
                            this.timelines.showError.play();
                            this.password = '';
                            this.setFocus();
                        }, 500);

                    }, 1000);
                });
        },
        setCookieForever(cname, cvalue) {
            var d = new Date();
            d.setTime(d.getTime() + (20 * 365 * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        },
        setFocus() {
            let input = document.querySelector('input');
            input.focus();
        },
        initAnimations() {
            // LOCK TO INPUT MORPH
            this.timelines.morphLockToInput
                .set('.lock', {
                    display: 'flex'
                })
                .from('.lock', 0.7, {
                    delay: 2.5,
                    scale: 0,
                    ease: Elastic.easeOut.config(1, 0.5)
                })
                .add(() => {
                    this.timelines.bounceLock.play()
                })
                .fromTo('.lock input', 0.5, {
                    width: 50,
                    height: 25
                }, {
                    width: 25,
                    height: 25,
                    scale: 1,
                    delay: 2.75,
                    ease: Elastic.easeIn.config(1, 0.75)
                })
                .from('.lock', 0.5, {
                    rotation: 90,
                    ease: Elastic.easeIn.config(1, 0.75)
                })
                .to('.lock input', 0.5, {
                    width: 220,
                    height: 40,
                    ease: Elastic.easeIn.config(1, 0.75)
                })
                .from('.lock input', 0.5, {
                    color: 'transparent',
                    ease: Power3.easeOut
                })
                .add(() => {
                    this.isInputReady = true;
                    this.setFocus();
                })

            // INPUT SHRINK
            this.timelines.shrinkInputField
                .to('.lock input', 1, {
                    width: 40,
                    height: 40,
                    padding: 0,
                    textShadow: 'transparent',
                    ease: Elastic.easeIn.config(1, 0.75)
                }, -0.5)
                .stop(); // starts when play() gets called

            // ROTATE LOCK / WAITING FOR PW CHECK
            this.timelines.rotateLock
                .to('.lock #lock-svg', 3, {
                    delay: 0.5,
                    rotation: "360",
                    ease: Linear.easeNone,
                    repeat: -1
                })
                .stop();

            // PASSWORD WRONG
            this.timelines.showError
                .to('#inner-lock', 0.2, {
                    autoAlpha: 0,
                    scale: 0.5
                }, 0)
                .to('.password-incorrect-icon', 0.75, {
                    autoAlpha: 1,
                    scale: 1.5,
                    ease: Elastic.easeOut.config(1, 0.5)
                }, 0)
                .to('.password-incorrect-text', 0.75, {
                    autoAlpha: 1,
                    scale: 1,
                    ease: Elastic.easeOut.config(1, 0.5)
                }, 0)
                .stop();

            // PASSWORD CORRECT
            this.timelines.showSuccess
                .to('.lock', 0.1, {
                    rotation: 0
                }, 0)
                .to('#inner-lock, .password-incorrect-text, .password-incorrect-icon', 0.2, {
                    autoAlpha: 0,
                    scale: 0.5
                }, 0)
                .to('.password-correct-icon', 0.75, {
                    autoAlpha: 1,
                    scale: 1,
                    ease: Elastic.easeOut.config(1, 0.5)
                }, 0)
                .to('html', 0.5, {
                    autoAlpha: 0,
                    background: '#fff'
                }, 1)
                .add(() => {
                    window.location.href = this.goToUrl;
                }, 1.5)
                .stop();

            this.timelines.bounceLock
                .to('.lock', 0.25, {
                    y: 5
                })
                .to('.lock', 0.25, {
                    y: -5
                })
                .to('.lock', 0.25, {
                    y: 0
                })
                .stop();
        },
        initTypewriter() {
            // SETUP
            let typewriterPartOne = new Typewriter('.typewriter-part-one');
            let typewriterPartTwo = new Typewriter('.typewriter-part-two', {
                loop: true
            });
            this.typewriterTextPartOne = JSON.parse(document.querySelector('h1').dataset.typewriterPartOne); // get sentence from template
            this.typewriterTextPartTwo = JSON.parse(document.querySelector('h1').dataset.typewriterPartTwo); // get sentences from template

            // MANIPULATE TYPEWRITER ONE
            typewriterPartOne
                .typeString(this.typewriterTextPartOne)
                .callFunction(() => {
                    document.querySelector('.Typewriter__cursor').style.display = 'none';
                    document.querySelector('.typewriter-part-one .Typewriter__cursor').style.display = 'none';
                    document.querySelector('.typewriter-part-two .Typewriter__cursor').style.display = 'inline-block';
                })
                .start()

            // MANIPULATE TYPEWRITER TWO
            this.typewriterTextPartTwo.forEach(sentence => {
                typewriterPartTwo
                    .typeString(sentence)
                    .pauseFor(2500)
                    .deleteAll(0.5);
            });

            setTimeout(() => {
                typewriterPartTwo.start();
            }, 2000);
        }
    }
});