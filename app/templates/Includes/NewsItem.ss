<div class="news_item">
    <% if $Image %>
        <a class="news_item_image" href="$Newspage.Link('post')/$LinkTitle">
            $Image.FocusFill(1000,300)
        </a>
    <% end_if %>
    <div class="news_item_text">
        <p class="text_undertitle news">$FormattedDate</p>
        <a href="$Newspage.Link('post')/$LinkTitle">
            <h3 class="news_title">$Title</h3>
        </a>
        <div class="news_description">
            <% if $Summary %>
                $Summary
            <% else %>
                $Description.LimitWordCount(20,'...')
            <% end_if %>
        </div>
        <div class="news_moreinfo" data-behaviour="showhide">
            <a class="news_moreinfo_text" href="$Newspage.Link('post')/$LinkTitle"><%t App.READMORE 'Weiterlesen...' %></a>
        </div>
    </div>
</div>
