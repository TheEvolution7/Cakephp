<?php echo $this->Form->create(); ?>
<div class="form-container">
    <div class="field">
        <h3 class="field__title ta-left">
            What type of provider would you like to see?
        </h3>
        <!-- <div class="field__label">Who is this visit for ?</div> -->
        <div class="package-container speciality-container">
            <div class="col-pack">
                <input type="radio" id="package-1" class="hidden" name="choose-package" value="General Practitioner"/>
                <label for="package-1" class="history__card">
                    <div class="history__logo">
                        <img class="history__pic" src="<?= $webroot ?>img/user/1.jpeg" alt="" />
                        <div class="check-box-custom"></div>
                    </div>
                    <div class="history__title">General Practitioner</div>
                    <div class="history__details">
                        <span class="history__company">See a Family doctor, ER doctor, or NP, any time 24/7.</span>
                    </div>
                    <div class="history__line">
                        <div class="history__time">CA$99</div>
                        <div class="history__status">
                            <div
                                class="tooltip icon"
                                title="Our doctors and NPs can diagnose and prescribe medications for many common medical conditions right on Maple. You can chat instantly by text, video or audio from your smartphone. All doctors and NPs are licensed in Canada and practice family or emergency medicine in local hospitals and clinics."
                            >
                                <svg class="icon icon-dots">
                                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <div class="col-pack">
                <input type="radio" id="package-2" class="hidden" name="choose-package" value="Caregiver Coach" />
                <label for="package-2" class="history__card">
                    <div class="history__logo">
                        <img class="history__pic" src="<?= $webroot ?>img/user/2.jpeg" alt="" />
                        <div class="check-box-custom"></div>
                    </div>
                    <div class="history__title">
                        Caregiver Coach
                    </div>
                    <div class="history__details">
                        <span class="history__company">Book an online appointment with a caregiver coach.</span>
                    </div>
                    <div class="history__line">
                        <div class="history__time">$79</div>
                        <div class="history__status">
                            <div
                                class="tooltip icon"
                                title="If you’re a family caregiver or are dealing with a health issue, you don’t need to navigate your journey alone. Our care coaches are here to provide one-on-one support for your specific needs and unique situation. You can chat with a coach by video or audio from your phone, tablet or computer. All practitioners have real life experiences as caregivers and are professionally trained coaches."
                            >
                                <svg class="icon icon-dots">
                                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <div class="col-pack">
                <input type="radio" id="package-3" class="hidden" name="choose-package" value="Life Coach" />
                <label for="package-3" class="history__card">
                    <div class="history__logo">
                        <img class="history__pic" src="<?= $webroot ?>img/user/3.jpeg" alt="" />
                        <div class="check-box-custom"></div>
                    </div>
                    <div class="history__title">
                        Life Coach
                    </div>
                    <div class="history__details">
                        <span class="history__company">
                            Book an online appointment with a life coach.
                        </span>
                    </div>
                    <div class="history__line">
                        <div class="history__time">$99</div>
                        <div class="history__status">
                            <div
                                class="tooltip icon"
                                title="If you’re not satisfied with your current reality and are ready to take proactive steps towards positive change, our life coaches can help. A life coach can help you clarify your goals, support you through challenges, and be a support system for you in times of need. You can chat by text, video or audio from your phone, tablet or computer."
                            >
                                <svg class="icon icon-dots">
                                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <div class="col-pack">
                <input type="radio" id="package-4" class="hidden" name="choose-package" value="Health and Wellness Coach" />
                <label for="package-4" class="history__card">
                    <div class="history__logo">
                        <img class="history__pic" src="<?= $webroot ?>img/user/4.jpeg" alt="" />
                        <div class="check-box-custom"></div>
                    </div>
                    <div class="history__title">
                        Health and Wellness Coach
                    </div>
                    <div class="history__details">
                        <span class="history__company">Book an online consultation with a health and wellness coach.</span>
                    </div>
                    <div class="history__line">
                        <div class="history__time"></div>
                        <div class="history__status">
                            <div
                                class="tooltip icon"
                                title="Looking for more than a checkup? Health and Wellness Coaching does not simply focus on your physical health but rather addresses your overall health and wellbeing. It acknowledges the interconnectedness of the mind, body and spirit, and the innate healing capacity within each person, with an emphasis on self-care. Our coaches are here to collaboratively address and motivate you to adopt positive behaviours for sustainable health and wellness. Our coaches will help you develop successful strategies and goals, access your strengths and help you reflect on progression or adaptation as needed."
                            >
                                <svg class="icon icon-dots">
                                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <div class="col-pack">
                <input type="radio" id="package-5" class="hidden" name="choose-package" value="Mental Health Therapist" />
                <label for="package-5" class="history__card">
                    <div class="history__logo">
                        <img class="history__pic" src="<?= $webroot ?>img/user/5.jpeg" alt="" />
                        <div class="check-box-custom"></div>
                    </div>
                    <div class="history__title">Mental Health Therapist</div>
                    <div class="history__details">
                        <span class="history__company">Connect with a mental health therapist in 12 hours or less. Available to patients aged 18 and over.</span>
                    </div>
                    <div class="history__line">
                        <div class="history__time">CA$120</div>
                        <div class="history__status">
                            <div
                                class="tooltip icon"
                                title="Our therapists can help you with stress, anxiety, depression, grief, and more. All therapists are Registered Social Workers (MSW RSW) or Registered Psychotherapists (RPs) and your sessions may be covered by private insurance, depending on your plan. You can chat by text, video, or audio from your phone, tablet, or computer. Please note that therapists cannot provide a diagnosis or prescribe medication."
                            >
                                <svg class="icon icon-dots">
                                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>

    <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue']) ?>
    <?= $this->Form->button(__('Next'), ['class' => 'btn btn_blue']) ?>
</div>
<? echo $this->Form->end();
