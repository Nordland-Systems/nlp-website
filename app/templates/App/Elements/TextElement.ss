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
        <% if $ButtonText && $ButtonLink %>
            <a href="$ButtonLink.Url" class="text_text_button readmore">$ButtonText</a>
        <% end_if %>
    </div>
</div>
