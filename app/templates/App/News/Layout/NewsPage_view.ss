<% with $News %>
    <div class="section section--news">
        <p class="news_date">$Date.Format("dd.MM.yyyy")</p>
        <h1>$Title</h1>
    </div>
    <% if $Image %>
    <div class="section section_newsimage">
        $Image.FocusFill(600,1200)
        <% if $ImageDescription %><p>$ImageDescription</p><% end_if %>
    </div>
    <% end_if %>
    <div class="section section_textblock section_textblock--description">
        <div class="section_text">
            $Description
        </div>
    </div>

    $ElementalArea

<% end_with %>
