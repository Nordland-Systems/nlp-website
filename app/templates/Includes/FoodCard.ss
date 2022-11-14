<div class="food_menu_item" data-behaviour="searchable">
    <% if $HeaderImage %>
        <div class="item_image">
            $HeaderImage.FocusFill(300, 200)
        </div>
    <% end_if %>
    <div class="item_text">
        <h2 class="item_title white centered">$Title</h2>
        <p class="centered">$Content</p>
        <p class="centered flairs">
            <% if $Vegetarian %><span>V </span><% end_if %>
            <% if $Vegan %><span>A </span><% end_if %>
            <% if $GlutenFree %><span>G </span><% end_if %>
            <% if $LactoseFree %><span>L </span><% end_if %>
            <% if $NutFree %><span>N </span><% end_if %>
            <% if $Halal %><span>H </span><% end_if %>
        </p>
    </div>
</div>
