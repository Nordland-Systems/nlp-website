<div class="section section--docsholder">
    <div class="section_content">
        <div class="docsholder_title">
            <h1>$Title</h1>
        </div>
        <div class="docscategories_list">
            <% loop getDocsCategories.Filter('Visible','1') %>
                <% if $Docs.Filter('Visible','1') %>
                    <div class="docscategory_wrap">
                        <div class="docscategory">
                            <h2>$Title</h2>
                            <div class="docs_list">
                            <% loop $Docs.Sort("Title", "ASC") %>
                                <a href="$Link" class="list_item">
                                    <h4>$Title</h4>
                                </a>
                            <% end_loop %>
                        </div>
                    </div>
                <% end_if %>
            </div>
            <% end_loop %>
        </div>
    </div>
</div>
$ElementalArea
