<a href="$Parent.Link('restaurant')/$FormattedName" class="attraction_item">
    <% if $HeaderImage %>
        <div class="item_image">
            $HeaderImage.FocusFill(300, 200)
        </div>
    <% end_if %>
    <h2 class="item_title white">$Title</h2>
    <% if $Type %><p class="item_id white">$Type</p><% end_if %>
    <p class="item_id white">
        <% if $Foods.Filter("Vegetarian", 1).Count > 0 %>Vegetarische, <% end_if %>
        <% if $Foods.Filter("Vegan", 1).Count > 0 %>Vegane, <% end_if %>
        <% if $Foods.Filter("GlutenFree", 1).Count > 0 %>Glutenfreie, <% end_if %>
        <% if $Foods.Filter("LactoseFree", 1).Count > 0 %>laktosefreie, <% end_if %>
        <% if $Foods.Filter("NutFree", 1).Count > 0 %>Nussfreie, <% end_if %>
        <% if $Foods.Filter("Halal", 1).Count > 0 %>Halal, <% end_if %>
        Leckere Gerichte
    </p>
</a>
