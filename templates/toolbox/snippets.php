<section class="b-base">
    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<h1>.b-base code</h1><br>

							<pre class="prettyprint"><?php echo htmlentities('<section class="b-base">

 <div class="c-background-image" style="background-image:url(http://s3.amazonaws.com/linkkerbus/wp-content/uploads/2016/09/18083431/WP_20160917_14_30_28_Pro.jpg);"></div>

    <div class="c-overlay"></div>

    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content" data-column-size="8">
                <div class="b-base__wrapper">
                	//layouts/components go here
                </div>
            </div>
        </div>
    </div>
</section>'); ?></pre>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="wysiwyg-html">
							<h1>.b-base explained</h1><br>
							<ul>
							<li><strong>section.b-base</strong> is just a normal section</li>
							<li><sttong>div.b-base__container</sttong> gives us our normal container width, modifiers should be applied here for changing widths</li>
							<li><strong>div.b-base__row</strong> is a normal row</li>
							<li><strong>div.b-base__content</strong> is essentially a col-xs-12 column where you can add a <strong>data-column-size</strong> attribute to control its width (1 - 12 like the Boostrap grid)</li>
							<li><strong>div.b-base__wrapper</strong> is where we can add or remove padding padding</li> 
							<li><strong>.c-background-image</strong> is an additional and optional component being used to create a background image</li>
							<li><strong>.c-overlay</strong> is an additional and optional component being used to create an overlay for the background image</li>
							</ul>

							<h2>Modifiers available</h2>
							<ul>
								<li><strong>b-base__container--full</strong> to make the section container 100% width</li>
								<li><strong>b-base__wrapper--padded</strong> to add padding to the wrapper</li>
							</ul>

							<p>If .b-base doesnt meet your needs then copy .b-base-example to your new block and enjoy.</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<h1>.b-base__wrapper content code example</h1><br>
							<pre class="prettyprint"><?php echo htmlentities('<div class="wysiwyg-html scheme scheme--inverted">
						
<h2>//layouts/components go here</h2>

<p>A couple paragraghs addeed to give this section some weight.</p>

<p>This is a paragraph of text. Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>. Occasionally <q>quoted text</q> may be found within a paragraph &hellip;and of course <a href="#">a link</a> may appear at any point in the text. The average paragraph contains five or six sentences although some may contain as little or one or two while others carry on for anything up to ten sentences and beyond.</p>
</div>'); ?></pre>
						</div>

						<div class="col-xs-12 col-sm-6">
							<div class="wysiwyg-html">
								<h1>.b-base__wrapper content explained</h1><br>
								<p>Within this element you can put layouts with components, or simply just components as show in the demo below.</p>
								<br><br>
							</div>
						</div>
					</div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="b-base">

 <div class="c-background-image" style="background-image:url(http://s3.amazonaws.com/linkkerbus/wp-content/uploads/2016/09/18083431/WP_20160917_14_30_28_Pro.jpg);"></div>

    <div class="c-overlay"></div>

    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content" data-column-size="8">
                <div class="b-base__wrapper">
                	
					<div class="wysiwyg-html scheme scheme--inverted">
						
						<h2>//layouts/components go here</h2>

	                	<p>A couple paragraghs addeed to give this section some weight.</p>

	                	<p>This is a paragraph of text. Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>. Occasionally <q>quoted text</q> may be found within a paragraph &hellip;and of course <a href="#">a link</a> may appear at any point in the text. The average paragraph contains five or six sentences although some may contain as little or one or two while others carry on for anything up to ten sentences and beyond.</p>
                	</div>
                </div>
            </div>
        </div>
    </div>
</section>