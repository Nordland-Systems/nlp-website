<div class="blog_post_meta">
    <p>$PublishDate.Format('dd.MM.YY')
        <% if $Categories.exists %>
            |
            <% loop $Categories %>
                <a href="$Link">$Title</a><% if not Last %>, <% end_if %>
            <% end_loop %>
        <% end_if %>
    </p>
</div>
