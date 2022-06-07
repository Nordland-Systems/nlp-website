<div class="section section--text $AlignVariant $ColorVariant">
    <div class="section_content">
        <% if ShowTitle %>
            <% if $Variant == "section--text-intro" %>
                <h1 class="text_title">$Title</h1>
            <% else %>
                <h2 class="text_title">$Title</h2>
            <% end_if %>
        <% end_if %>
        <div class="text_content">$Text</div>
        <% if $Button %>
            <a href="$Button.Url" <% if $Button.OpenInNew %> target="_blank"<% end_if %> class="link--button hollow text_text_button readmore">$Button.Title</a>
        <% end_if %>
    </div>
</div>
