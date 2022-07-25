<div class="section section--team_overview">
    <div class="section_content">
        <% if $ShowTitle %>
            <div class="section_title">
                <h2>$Title</h2>
            </div>
        <% end_if %>
        <% if $Text %>
            $Text
        <% end_if %>
        <% if $DataType == "founders" %>
            <div class="teammember_list">
                <% loop $Founders.Filter("Status", "active") %>
                    <div class="teammember_item">
                        <div class="teammember_border">
                            <% if $Description %>
                                <p>$TeamSite.Title</p>
                                <a class="teammember_texts no_deco" href="$Top.MemberLink/$FormattedName/?source=$Top.Link">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </a>
                            <% else %>
                                <div class="teammember_texts no_deco">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </div>
                            <% end_if %>
                            <div class="social_icons">
                                <% loop $Socials %>
                                    <% include SocialIcon %>
                                <% end_loop %>
                            </div>
                        </div>
                    </div>
                <% end_loop %>
            </div>
        <% end_if %>
        <% if $DataType == "members" %>
            <div class="teammember_list">
                <% loop $Members.Filter("Status", "active") %>
                    <div class="teammember_item">
                        <div class="teammember_border">
                            <% if $Description %>
                                <a class="teammember_texts no_deco" href="$Top.MemberLink/$FormattedName/?source=$Top.Link">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </a>
                            <% else %>
                                <div class="teammember_texts no_deco">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </div>
                            <% end_if %>
                            <div class="social_icons">
                                <% loop $Socials %>
                                    <% include SocialIcon %>
                                <% end_loop %>
                            </div>
                        </div>
                    </div>
                <% end_loop %>
            </div>
        <% end_if %>
        <% if $DataType == "partners" %>
            <div class="teammember_list">
                <% loop $Partners.Filter("Status", "active") %>
                    <div class="teammember_item">
                        <div class="teammember_border">
                            <% if $Description %>
                                <a class="teammember_texts no_deco" href="$Top.MemberLink/$FormattedName/?source=$Top.Link">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </a>
                            <% else %>
                                <div class="teammember_texts no_deco">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </div>
                            <% end_if %>
                            <div class="social_icons">
                                <% loop $Socials %>
                                    <% include SocialIcon %>
                                <% end_loop %>
                            </div>
                        </div>
                    </div>
                <% end_loop %>
            </div>
        <% end_if %>
        <% if $DataType == "formers" %>
            <div class="teammember_list">
                <% loop $Formers %>
                    <div class="teammember_item">
                        <div class="teammember_border">
                            <% if $Description %>
                                <a class="teammember_texts no_deco" href="$Top.MemberLink/$FormattedName/?source=$Top.Link">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </a>
                            <% else %>
                                <div class="teammember_texts no_deco">
                                    <div class="face">
                                        $Image.FocusFill(400,400)
                                    </div>
                                    <p class="teammember_item_name">$Title</p>
                                    <p class="teammember_item_profession">$Profession</p>
                                </div>
                            <% end_if %>
                            <div class="social_icons">
                                <% loop $Socials %>
                                    <% include SocialIcon %>
                                <% end_loop %>
                            </div>
                        </div>
                    </div>
                <% end_loop %>
            </div>
        <% end_if %>
    </div>
</div>
