<% require css('silverstripe/blog: client/dist/styles/main.css') %>

<% if $FeaturedImage %>
<section class="section section--imagebanner" style="height: 500px" >
    <div class="section_content" data-behaviour="parallax" data-speed="0.2" style="background-image:url($FeaturedImage.FocusFill(1400,600).Link)">
    </div>
</section>
<% end_if %>

<article>

    <div class="section">
        <div class="section_content">
            <h1 class="content_title">$Title</h1>
        </div>
    </div>

    $ElementalArea

    <div class="section">
        <div class="section_content">
            <% include SilverStripe\\Blog\\EntryMeta %>
        </div>
    </div>
</article>
