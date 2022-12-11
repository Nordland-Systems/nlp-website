<% if $DocsPermission || $VisibleToGuests %>
    <% with $Targetgroup %>

        <div class="section section--docs_title noimage">
            <div class="section_content">
                <a class="link--button backbutton" href="$Top.Link"></a>
                <h1 class="header_text_title">Zielgruppe: $Title</h1>
            </div>
        </div>

        <div class="section section--docs_description">
            <div class="section_content">
                <p>$Description</p>
            </div>
        </div>

        <div class="section section--docs_attractionslist">
            <div class="section_content">

                <div class="docs_list">
                    <h3>Attraktionen:</h3>
                    <% if $Attractions.Filter('VisibleToDreamteam','1').Count > 0 %>
                        <% loop $Attractions.Filter('VisibleToDreamteam','1') %>
                            <% include AttractionCard Parent=$Top %>
                        <% end_loop %>
                    <% else %>
                        <p>Keine Attraktionen vorhanden.</p>
                    <% end_if %>
                </div>
            </div>
        </div>
    <% end_with %>
<% else %>
    <div class="section section--docs_login">
        <div class="section_content">
            <h2>Keine Berechtigung!</h2>
            <p>Du hast keine Berechtigung diesen Inhalt anzusehen.</p>
            <a href="admin">Bitte logge dich ein</a>
        </div>
    </div>
<% end_if %>
