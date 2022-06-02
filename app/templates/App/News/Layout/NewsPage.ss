<div class="section section--newslist">
    <div class="section_content">
        <div class="section_header">
            <h1>$Title</h1>
        </div>

        <div class="news">
            <% loop $News %>
                <% include NewsItem %>
            <% end_loop %>
        </div>
        <% include Pagination ItemList=$News %>
    </div>
</div>
