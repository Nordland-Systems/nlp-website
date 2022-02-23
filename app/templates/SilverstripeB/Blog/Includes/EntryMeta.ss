<p class="blog_post_meta">
    <% if $Categories.exists %>
        <p>
            <%t SilverStripe\\Blog\\Model\\Blog.PostedIn "Posted in" %>
            <% loop $Categories %>
                $Title<% if not Last %>, <% end_if %>
            <% end_loop %>
        </p>
    <% end_if %>

    <p><%t SilverStripe\\Blog\\Model\\Blog.Posted "Posted" %>
    $PublishDate.ago</p>
</p>
