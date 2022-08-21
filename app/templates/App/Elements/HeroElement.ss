<section class="section section--hero $Overlay">
    <div class="section_content light" data-behaviour="parallax" data-speed="$Parallax" style="background-image:url($BackgroundImage.FocusFill(2000, 1000).Link)">
    </div>
    <% if $BackgroundImageDarkmode %>
        <div class="section_content dark" data-behaviour="parallax" data-speed="$Parallax" style="background-image:url($BackgroundImageDarkmode.FocusFill(2000, 1000).Link)">
        </div>
    <% else %>
        <div class="section_content light" data-behaviour="parallax" data-speed="$Parallax" style="background-image:url($BackgroundImage.FocusFill(2000, 1000).Link)">
        </div>
    <% end_if %>
    <div class="section_inner" data-behaviour="parallax" data-speed="0.2">
        $Image.ScaleWidth(600)
        <h2 class="section_inner_subline">$Subline</h2>
    </div>
</section>
