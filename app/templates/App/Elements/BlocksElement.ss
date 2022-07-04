<div class="section section--blocks">
    <div class="section_content">
        <% if $ShowTitle %>
            <div class="section_title">
                <h2>$Title</h2>
            </div>
        <% end_if %>
        <div class="section_list">
            <% loop $Blocks %>
                <% if $Link %>
                    <a href="$Link.URL" <% if $Link.OpenInNew %> target="_blank" <% end_if %> class="block">
                        <div class="block_image">
                            $Image.FocusFill(300,300)
                        </div>
                        <div class="block_text">
                            <h3 class="block_text_title">
                                $Title
                            </h3>
                            <div class="block_text_content">
                                $Text.LimitWordCount(15,'...')
                            </div>
                        </div>
                    </a>
                <% else %>
                    <div class="block">
                        <div class="block_image">
                            $Image.FocusFill(300,300)
                        </div>
                        <div class="block_text">
                            <h3 class="block_text_title">
                                $Title
                            </h3>
                            <div class="block_text_content">
                                $Text.LimitWordCount(15,'...')
                            </div>
                        </div>
                    </div>
                <% end_if %>
            <% end_loop %>
        </div>
    </div>
</div>
