<div class="section section--textimage">
    <div class="section_content $Highlight $Variant $ImgWidth">
        <% if $Image %>
            <div class="textimage_image">
                $Image.FocusFill(1000,800)
            </div>
        <% end_if %>

        <div class="textimage_text">
            <div class="textimage_text_content">
                <% if $ShowTitle %>
                    <h2 class="textimage_text_title">$Title</h2>
                <% end_if %>
                $Text
                <% if $Button %>
                    <a href="$Button.Url" <% if $Button.OpenInNew %> target="_blank"<% end_if %> class="link--button hollow textimage_text_button readmore">$Button.Title</a>
                <% end_if %>
            </div>
        </div>
    </div>
</div>
