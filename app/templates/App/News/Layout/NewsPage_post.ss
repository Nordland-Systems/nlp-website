<% with $News %>
    <div class="section section--news_view">
        <div class="section_content">
            <% if $Image %>
            <div class="newsview_image">
                $Image.FocusFill(1200,500)
                <% if $ImageDescription %><p>$ImageDescription</p><% end_if %>
            </div>
            <% end_if %>

            <h1 class="newsview_title">$Title</h1>
            <div class="newsview_text">
                $Description
            </div>
            <p class="newsview_date">$Date.Format("dd.MM.yyyy")</p>
        </div>
    </div>

    $ElementalArea

<% end_with %>
