<div class="section section--team_overview">
    <div class="section_content">
        <% if $TeamMembers.Filter("Status", "active").Count > 0 %>
            <h2><%t Team.ACTIVES 'Aktive' %></h2>
            <h3><%t Team.FOUNDERS 'Gründer' %></h3>
            <div class="teammember_list">
                <% loop $Founders.Filter("Status", "active") %>
                    <% include TeamMember TopScope=$Top %>
                <% end_loop %>
            </div>
            <% if $Members.Filter("Status", "active").Count > 0 %>
                <h3><%t Team.MEMBERS 'Nordländer' %></h3>
                <div class="teammember_list">
                    <% loop $Members.Filter("Status", "active") %>
                        <% include TeamMember TopScope=$Top %>
                    <% end_loop %>
                </div>
            <% end_if %>
            <% if $Partners.Filter("Status", "active").Count > 0 %>
                <h3><%t Team.PARTNERS 'Partner' %></h3>
                <div class="teammember_list">
                    <% loop $Partners.Filter("Status", "active") %>
                        <% include TeamMember TopScope=$Top %>
                    <% end_loop %>
                </div>
            <% end_if %>
        <% end_if %>
        <% if $TeamMembers.Filter("Status", "formerly").Count > 0 %>
            <hr>
            <br>
            <h2><%t Team.FORMERS 'Ehemalige' %></h2>
            <div class="teammember_list">
                <% loop $TeamMembers.Sort("Importance", DESC).Filter("Status", "formerly") %>
                    <% include TeamMember TopScope=$Top %>
                <% end_loop %>
            </div>
        <% end_if %>
    </div>
</div>

$ElementalArea
