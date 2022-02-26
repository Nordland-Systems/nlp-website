<% require css('silverstripe/blog: client/dist/styles/main.css') %>

<% if $FeaturedImage %>
<section class="section section--imagebanner" style="height: 500px" >
    <div class="section_content" data-behaviour="parallax" data-speed="0.2" style="background-image:url($FeaturedImage.ScaleWidth(800).Link)">
    </div>
</section>
<% end_if %>

<div class="section section--blogentry">
    <div class="section_content">
        <article>

            <h1 class="content_title">$Title</h1>

            <div class="content">$ElementalArea</div>

            <% include SilverStripe\\Blog\\EntryMeta %>
        </article>
    </div>
</div>
