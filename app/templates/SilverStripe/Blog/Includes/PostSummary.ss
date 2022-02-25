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
                <% loop $Categories.Limit(3) %>
                    <% if $Title == "Allgemein" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_nlp.png">
                        </a>
                    <% else_if $Title == "Gestaltung" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_design.png">
                        </a>
                    <% else_if $Title == "Einkauf" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_shopping.png">
                        </a>
                    <% else_if $Title == "Veranstaltung" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_event.png">
                        </a>
                    <% else_if $Title == "Unterhaltung" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_entertainment.png">
                        </a>
                    <% else_if $Title == "Technik" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_tech.png">
                        </a>
                    <% else_if $Title == "Nahrung" %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_food.png">
                        </a>
                    <% else %>
                        <a href="$Link" class="category_icon">
                            <img src="images/category/category_other.png">
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
