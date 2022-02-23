<div class="post_summary">
    <div class="post_image">
        <a href="$Link">
            $FeaturedImage.ScaleWidth(795)
        </a>
    </div>
    <div class="post_text">
        <a href="$Link">
            <h2>
                <% if $MenuTitle %>$MenuTitle
                <% else %>$Title<% end_if %>
            </h2>
        </a>


        <% if $Categories.exists %>
            <div class="category_icons">
                <% loop $Categories %>
                    <% if $Title == "Art" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/social_media/logo_website.png">
                        </a>
                    <% end_if %>
                    <% if $Title == "Konzept" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/social_media/logo_facebook.png">
                        </a>
                    <% end_if %>
                <% end_loop %>
            </div>
        <% end_if %>

        <% if $Summary %>
            $Summary
        <% else %>
            <p>$Excerpt</p>
        <% end_if %>
        <div class="meta">
            <% include SilverStripe\\Blog\\EntryMeta %>
        </div>
    </div>
</div>
