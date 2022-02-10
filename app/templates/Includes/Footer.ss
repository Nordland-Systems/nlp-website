<div class="footer">
    <div class="footer_content">
        <div class="footer_text">E-Mail: <a href="mailto:kontakt@theater-und-musik-in-ahrensburg.de">kontakt@theater-und-musik-in-ahrensburg.de</a></div>
        <div class="footer_text">Tel.: 04532 2769286</div>
        <div class="footer_menu">
            <ul role="list" class="footer_menu_list w-list-unstyled">
                <% loop $Menu(1) %>
                <% if $MenuPosition == "footer" %>
                <li class="footer_menu_item">
                    <a href="$Link" class="footer_text">$MenuTitle</a>
                </li>
                <% end_if %>
                <% end_loop %>
            </ul>
        </div>
    </div>
</div>
