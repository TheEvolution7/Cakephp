<footer id="footer" class="footer section">
                        <div class="footer-flex">
                            <div class="flex-item">
                                <a class="brand pull-left" href="<?= $this->Url->build('/') ?>">
                                    <img alt="" src="<?= $webroot ?>images/logo.png">
                                </a>
                            </div>
                            <div class="flex-item">
                                <div class="inline-block">© Fengari 2021<br>All Rights Resevered</div>
                            </div>
                            <div class="flex-item">
                                <ul>
                                    <li><a href="">Term & Conditions</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                    <li><a href="">Help</a></li>
                                </ul>
                            </div>
                            <div class="flex-item">
                                <ul>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'process']) ?>">Process</a>
                                    </li>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Albums', 'action' => 'index']) ?>">Project</a>
                                    </li>
                                    
                                    <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']) ?>">Contact</a></li>
                                </ul>
                            </div>
                            <div class="flex-item">
                                <ul>
                                    <li class="active"><a href="">CALL US: (+080) 9684 32 45 789</a></li>
                                </ul>
                            </div>
                            <div class="flex-item">
                                <div class="social-list">
                                    <a href="" class="icon ion-social-facebook"></a>
                                    <a href="" class="icon ion-social-googleplus"></a>
                                    <a href="" class="icon ion-social-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </footer>