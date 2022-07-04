<div class="section section--blocks">
    <div class="section_content">
        <% if $ShowTitle %>
            <div class="section_title">
                <h2>$Title</h2>
            </div>
        <% end_if %>
        <div class="section_list">
            <% loop $Blocks %>
                <div class="list_item">
                    <div class="list_item_image">
                        $Image.FocusFill(300,300)
                    </div>
                    <div class="list_item_content_title">
                        <h3>$Title</h3>
                    </div>
                    <div class="list_item_content_text">
                        $Text
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>
