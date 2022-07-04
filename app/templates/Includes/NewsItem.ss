<div class="news_item">
    <div class="news_item_text">
        <p class="text_undertitle news">$FormattedDate</p>
        <a href="$Link">
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
            <a class="news_moreinfo_text"><%t App.READMORE 'Weiterlesen...' %></a>
        </div>
    </div>
    <a class="news_item_image" href="$Link">
        $Image.FocusFill(300,300)
    </a>
</div>
