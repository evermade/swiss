<a href="#" class="c-btn js-toolbox-switch" data-activate-scheme="scheme">Default</a>
<a href="#" class="c-btn js-toolbox-switch" data-activate-scheme="scheme--inverted">Inverted</a>
<div id="js-toolbox-scheme-target" class="b-toolbox__scheme-wrapper scheme">

    <h5>Typography</h5>
    <hr>

    <div class="b-toolbox__component-row" data-name="h1, .h1" data-description="">
        <h1>This is a headline</h1>
    </div>
    <div class="b-toolbox__component-row" data-name="h2, .h2" data-description="">
        <h2>This is a headline</h2>
    </div>
    <div class="b-toolbox__component-row" data-name="h3, .h3" data-description="">
        <h3>This is a headline</h3>
    </div>
    <div class="b-toolbox__component-row" data-name="h4, .h4" data-description="">
        <h4>This is a headline</h4>
    </div>
    <div class="b-toolbox__component-row" data-name="h5, .h5" data-description="">
        <h5>This is a headline</h5>
    </div>
    <div class="b-toolbox__component-row" data-name="h6, .h6" data-description="">
        <h6>This is a headline</h6>
    </div>
    <div class="b-toolbox__component-row" data-name="p.text-lg" data-description="">
        <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore voluptatibus hic ab, tempora sunt eos illo fuga rem consectetur corporis molestiae doloribus impedit magni nulla, pariatur cupiditate fugit, magnam eligendi.</p>
    </div>
    <div class="b-toolbox__component-row" data-name="p" data-description="">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore voluptatibus hic ab, tempora sunt eos illo fuga rem consectetur corporis molestiae doloribus impedit magni nulla, pariatur cupiditate fugit, magnam eligendi.</p>
    </div>
    <div class="b-toolbox__component-row" data-name="p.text-sm" data-description="">
        <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore voluptatibus hic ab, tempora sunt eos illo fuga rem consectetur corporis molestiae doloribus impedit magni nulla, pariatur cupiditate fugit, magnam eligendi.</p>
    </div>
    <div class="b-toolbox__component-row" data-name="p > a" data-description="">
        <p><a href="">Lorem ipsum</a></p>
    </div>
    <div class="b-toolbox__component-row" data-name="a" data-description="">
        <a href="">Lorem ipsum</a>
    </div>

    <h5>Components</h5> 
    <hr>

    <div class="b-toolbox__component-row" data-name=".c-btn" data-description="@include btn;">
        <a href="/" class="c-btn">Normal Button</a>
    </div>
    <div class="b-toolbox__component-row" data-name=".c-btn-small" data-description="@include btn-small;">
        <a href="/" class="c-btn-small">Small Button</a>
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

    <h5>Variables</h5>
    <hr>

    <div class="b-toolbox__component-row" data-name="$shadow" data-description="@include shadow;">
        <div class="b-toolbox__box b-toolbox__box--shadow"></div>
    </div>

    <div class="b-toolbox__component-row" data-name="$shadow-large" data-description="@include shadow(large);">
        <div class="b-toolbox__box b-toolbox__box--shadow--large"></div>
    </div>

    <div class="b-toolbox__component-row" data-name="$border-radius" data-description="@include border-radius;">
        <div class="b-toolbox__box b-toolbox__box--border-radius"></div>
    </div>

    <h5>Spacing</h5>
    <hr>

    <p>Spacings are part of $spacing-sizes variable matrix. Use @mixin spacing; and it's documentation to achieve these.</p>

    <div class="b-toolbox__component-row" data-name="$spacing-sizes[section]" data-description="@include spacing(section);">
        <div class="b-toolbox__box b-toolbox__box--spacing-section"></div>
    </div>

    <div class="b-toolbox__component-row" data-name="$spacing-sizes[box]" data-description="@include spacing(box);">
        <div class="b-toolbox__box b-toolbox__box--spacing-box"></div>
    </div> 

    <h5>Mixins</h5>
    <hr>

    <div class="b-toolbox__component-row" data-name="@bp" data-description="Responsive rules for classes.">
        @include bp(md,max);
    </div>

    <div class="b-toolbox__component-row" data-name="@font-size" data-description="Responsive font-sizes. Uses the $font-sizes variable matrix found under _variables.scss">
        @include font-size(base);
    </div>

    <div class="b-toolbox__component-row" data-name="@container" data-description="The width of the website container. Use it as much as possible.">
        @include container;
    </div>

    <div class="b-toolbox__component-row" data-name="@section" data-description="Apply to all b-block section elements. This way we can apply changes to all sections later on.">
        @include section;
    </div>

    <div class="b-toolbox__component-row" data-name="@spacing" data-description="Spacing mixin that should only be used for classes that has a purpose for it. @include padding(section); is a good example.">
        @include spacing(section,top,padding);
    </div>

    <div class="b-toolbox__component-row" data-name="@transition" data-description="Default animation for ui:hover and similar.">
        @include transition;
    </div>

    <div class="b-toolbox__component-row" data-name="@animation" data-description="Animation for visual attractiveness. Choose from animation/_animation.scss. Feel free to create new animations for projects.">
        @include animation( fadeInUp, 0.6s, backwards, $ease-out-expo, 0.3s);
    </div>



</div>