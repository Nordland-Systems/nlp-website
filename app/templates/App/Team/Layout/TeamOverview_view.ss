<% with $TeamMember %>
    <div class="section section--team_details">
        <div class="section_content">
            <a class="white no_deco back" href="$Top.Link"><%t Team.BACKTOOVERVIEW 'Zurück zur Übersicht' %></a>
            <div class="teammember_item_image">
                $Image.FocusFill(600,600)
            </div>
            <h1 class="teammember_name">$Title</h1>
            <p class="teammember_profession">$Profession</p>
            <p class="teammember_time">$Jointime</p>

            <div class="teammember_description">
                $Description
            </div>
            <div class="social_icons">
                <% loop $Socials %>
                    <% include SocialIcon %>
                <% end_loop %>
            </div>
        </div>
    </div>
<% end_with %>
