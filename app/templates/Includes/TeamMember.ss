<div class="teammember_item">
    <div class="teammember_border">
        <% if $Description %>
            <a class="teammember_texts no_deco" href="$TopScope.Link('view')/$LinkTitle/?source=$TopScope.Link">
                <div class="face">
                    $Image.FocusFill(400,400)
                </div>
                <p class="teammember_item_name">$Title</p>
                <p class="teammember_item_profession">$Profession</p>
            </a>
        <% else %>
            <div class="teammember_texts no_deco">
                <div class="face">
                    $Image.FocusFill(400,400)
                </div>
                <p class="teammember_item_name">$Title</p>
                <p class="teammember_item_profession">$Profession</p>
            </div>
        <% end_if %>
        <div class="social_icons">
            <% loop $Socials %>
                <% include SocialIcon %>
            <% end_loop %>
        </div>
    </div>
</div>
