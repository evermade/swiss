<section class="b-toolbox">
    <div class="b-toolbox__container">
        <div id="js-toolbox-scheme-target" class="b-toolbox__scheme-wrapper s-context">
            <a href="#" class="c-btn js-toolbox-switch" data-activate-scheme="s-context">Default</a>
            <a href="#" class="c-btn js-toolbox-switch" data-activate-scheme="s-context--inverted">Inverted</a>
            <br><br>

            <div data-scheme-target>

            <h5>Typography</h5>
            <hr>

            <div class="b-toolbox__component-row" data-name="h1, .h1" data-description="">
                <h1>This is a testing text for a headline and it is actually very long so make sure it line-height looks good.</h1>
            </div>
            <div class="b-toolbox__component-row" data-name="h2, .h2" data-description="">
                <h2>This is a testing text for a headline and it is actually very long so make sure it line-height looks good.</h2>
            </div>
            <div class="b-toolbox__component-row" data-name="h3, .h3" data-description="">
                <h3>This is a testing text for a headline and it is actually very long so make sure it line-height looks good.</h3>
            </div>
            <div class="b-toolbox__component-row" data-name="h4, .h4" data-description="">
                <h4>This is a testing text for a headline and it is actually very long so make sure it line-height looks good.</h4>
            </div>
            <div class="b-toolbox__component-row" data-name="h5, .h5" data-description="">
                <h5>This is a testing text for a headline and it is actually very long so make sure it line-height looks good.</h5>
            </div>
            <div class="b-toolbox__component-row" data-name="h6, .h6" data-description="">
                <h6>This is a testing text for a headline and it is actually very long so make sure it line-height looks good.</h6>
            </div>
            <div class="b-toolbox__component-row" data-name="p.text-lg" data-description="">
                <p class="text-lg">This is a testing text for a paragraph and it is actually very long so make sure it line-height looks good. This is a testing text for a paragraph and it is actually very long so make sure it line-height looks good.</p>
            </div>
            <div class="b-toolbox__component-row" data-name="p" data-description="">
                <p>This is a testing text for a paragraph and it is actually very long so make sure it line-height looks good. This is a testing text for a paragraph and it is actually very long so make sure it line-height looks good.</p>
            </div>
            <div class="b-toolbox__component-row" data-name="p.text-sm" data-description="">
                <p class="text-sm">This is a testing text for a paragraph and it is actually very long so make sure it line-height looks good. This is a testing text for a paragraph and it is actually very long so make sure it line-height looks good.</p>
            </div>
            <div class="b-toolbox__component-row" data-name="p > a" data-description="">
                <p>This is a testing text for a paragraph and it is actually very long so <a href="#">make sure it line-height looks good</a>. This is a testing text for a paragraph and it is actually very long so make sure it line-height looks good.</p>
            </div>
            <div class="b-toolbox__component-row" data-name="a" data-description="">
                <p><a href="">Link text which might be longer</a></p>
            </div>

            <h5>Components</h5>
            <hr>

            <div class="b-toolbox__component-row" data-name=".c-btn" data-description="@include btn;">
                <a href="/" class="c-btn">Normal Button</a>
            </div>
            <div class="b-toolbox__component-row" data-name=".c-cta-link" data-description="@include cta-link;">
                <a href="/" class="c-cta-link">Small Button</a>
            </div>

            <h5>Elements</h5>
            <hr>

            <div class="b-toolbox__component-row" data-name=".c-overlay" data-description="$overlay-bg, @include overlay;">
                <div class="b-toolbox__box">
                    <div class="c-image" style="background-image:url('http://lorempixel.com/100/100/');"></div>
                    <div class="c-overlay"></div>
                </div>
            </div>

            <div class="b-toolbox__component-row" data-name=".c-image" data-description="">
                <div class="b-toolbox__box">
                    <div class="c-image" style="background-image:url('http://lorempixel.com/100/100/');"></div>
                </div>
            </div>

            <div class="b-toolbox__component-row" data-name=".c-share" data-description="Add sharing icons on any page.">
                <div class="c-share">
                    <h6 class="c-share__title">Share:</h6>
                    <ul class="c-share__list">
                        <li>
                            <a href="http://www.facebook.com/sharer/sharer.php?u=http://timo.em87.io/hello-world/" title="Share on Facebook" class="facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://twitter.com/share?url=http://timo.em87.io/hello-world/&text=Hello world!" title="Share on Twitter" class="twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=http://timo.em87.io/hello-world/&title=Hello world!&summary=Welcome to WordPress. This is your first post. Edit or delete it, then start writing!&source=swiss" title="Share on Linkedin" class="linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/share?url=http://timo.em87.io/hello-world/" title="Share on Google" class="google">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:?subject=Hello world!&body=http://timo.em87.io/hello-world/" title="Share on Email" class="email">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <h5>Variables</h5>
            <hr>

            <div class="b-toolbox__component-row" data-name="$box-shadow-default" data-description="">
                <div class="b-toolbox__box b-toolbox__box--shadow"></div>
            </div>

            <div class="b-toolbox__component-row" data-name="$box-shadow-large" data-description="">
                <div class="b-toolbox__box b-toolbox__box--shadow--large"></div>
            </div>

            <h5>Spacing</h5>
            <hr>

            <p>Spacings are part of $spacing-sizes variable matrix. Use @mixin spacing; and it's documentation to achieve these.</p>

            <div class="b-toolbox__component-row" data-name="$spacing-sizes[section]" data-description="@include spacing(section);">
                <div class="b-toolbox__box b-toolbox__box--spacing-section"></div>
            </div>

            <div class="b-toolbox__component-row" data-name="$spacing-sizes[itemspace]" data-description="@include spacing(itemspace);">
                <div class="b-toolbox__box b-toolbox__box--spacing-itemspace"></div>
            </div>

            <div class="b-toolbox__component-row" data-name="$spacing-sizes[box]" data-description="@include spacing(box);">
                <div class="b-toolbox__box b-toolbox__box--spacing-box"></div>
            </div>

            <h5>Mixins</h5>
            <hr>

            <div class="b-toolbox__component-row" data-name="@bp" data-description="Responsive rules for classes.">
                <p>@include bp(md,max);</p>
            </div>

            <div class="b-toolbox__component-row" data-name="@font-size" data-description="Responsive font-sizes. Uses the $font-sizes variable matrix found under _variables.scss">
                <p>@include font-size(base);</p>
            </div>

            <div class="b-toolbox__component-row" data-name="@container" data-description="The width of the website container. Use it as much as possible.">
                <p>@include container;</p>
            </div>

            <div class="b-toolbox__component-row" data-name="@section" data-description="Apply to all b-block section elements. This way we can apply changes to all sections later on.">
                <p>@include section;</p>
            </div>

            <div class="b-toolbox__component-row" data-name="@spacing" data-description="Spacing mixin that should only be used for classes that has a purpose for it.">
                <p>@include spacing(padding, top, section);</p>
            </div>

            <div class="b-toolbox__component-row" data-name="@animation" data-description="Animation for visual attractiveness. Choose from animation/_animation.scss. Feel free to create new animations for projects.">
                <p>@include animation( fadeInUp, 0.6s, backwards, $ease-out-expo, 0.3s);</p>
            </div>

            </div>

        </div>
    </div>
</section>
