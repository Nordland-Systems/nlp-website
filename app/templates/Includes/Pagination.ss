<div class="section_pagination">
    <% if $ItemList.MoreThanOnePage %>
        <% if $ItemList.NotFirstPage %>
            <a class="page page--prev" href="$ItemList.PrevLink">&lt;</a>
        <% end_if %>
        <% loop $ItemList.PaginationSummary %>
            <% if $CurrentBool %>
                <span class="page page--current">$PageNum</span>
            <% else %>
                <% if $Link %>
                    <a class="page" href="$Link">$PageNum</a>
                <% else %>
                    ...
                <% end_if %>
            <% end_if %>
        <% end_loop %>
        <% if $ItemList.NotLastPage %>
            <a class="page page--next" href="$ItemList.NextLink">&gt;</a>
        <% end_if %>
    <% end_if %>
</div>
