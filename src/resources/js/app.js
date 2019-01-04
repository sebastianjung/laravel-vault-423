import Vue from 'vue';
import axios from 'axios';
import { TimelineMax, Linear, Ease, Power3 } from 'gsap';
import Typewriter from 'typewriter-effect/dist/core';

var app = new Vue({
    el: '#vault-423',
    data: {
        password: '',
        isPasswordIncorrect: false,
        timelines: {
            lockToInputMorph: new TimelineMax(),
            shrinkInputField: new TimelineMax(),
            rotateLock: new TimelineMax(),
            showError: new TimelineMax(),
            showSuccess: new TimelineMax()
        }
    },
    mounted() {
        this.initAnimations();
        this.initTypewriter();
    },
    methods: {
        submit(goToUrl) {
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
        initAnimations() {
            // LOCK TO INPUT MORPH
            this.timelines.lockToInputMorph
                .from('.lock', 0.7, {
                    delay: 4,
                    scale: 0,
                    ease: Elastic.easeOut.config(1, 0.5)
                })
                .from('.lock', 0.5, {
                   rotation: 90,
                   ease: Elastic.easeIn.config(1, 0.75)
                }, '+=0.1')
                .from('.lock input', 0.5, {
                    height: 25,
                    width: 57,
                    color: 'transparent',
                    padding: 0,
                    ease: Power3.easeOut
                })
            .play(); // starts at page load

            // INPUT SHRINK
            this.timelines.shrinkInputField
                .to('.lock input', 1, {
                    width: 40,
                    textShadow: 'transparent',
                    padding: 0,
                    ease: Elastic.easeIn.config(1, 0.75)
                }, '-0.5')
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
                .to('.lock', 5, {
                    scale: 20,
                    ease: Elastic.easeOut.config(1, 0.5)
                })
                .to('html', 0.5, {
                    autoAlpha: 0,
                    background: '#fff'
                }, 1)
                .add(() => {
                    window.location.href = this.goToUrl;
                }, 1.5)
            .stop();
        },
        initTypewriter() {
            let typewriter = new Typewriter('.typewriter-js', {
                loop: true
            });

            typewriter
                .changeDeleteSpeed(0.5)
                .typeString('Hier wird entwickelt.')
                .pauseFor(2500)
                .deleteChars(11)
                .typeString('das Passwort eingegeben.')
                .pauseFor(2500)
                .deleteChars(24)
                .typeString('Herzblut reingesteckt.')
                .pauseFor(2500)
                .deleteChars(22)
                .typeString('Großes erschaffen!')
                .pauseFor(2500)
                .deleteChars(17)
                .start();
        }
    }
});