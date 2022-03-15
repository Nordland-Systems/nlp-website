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
                        <a href="$Top.Link('category')/$ID"><h2>$Title</h2></a>
                            <div class="docs_list">
                                <% loop $Docs.Sort("Title", "ASC").Limit(5) %>
                                    <a href="$Top.Link('view')/$ID" class="list_item">
                                        <h4>$Title</h4>
                                    </a>
                                <% end_loop %>
                                <% if $Docs.Count > 5 %>
                                    <a href="$Top.Link('category')/$ID" class="list_more">
                                        <h5>Mehr $Title ></h5>
                                    </a>
                                <% end_if %>
                            </div>
                        </div>
                    </div>
                <% end_if %>
            <% end_loop %>
        </div>
    </div>
</div>
$ElementalArea
