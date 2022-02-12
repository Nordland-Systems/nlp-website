<div class="section section--fullwidth footer">
    <div class="footer_icon">
        <a href="/"><img src="images/NLP_LogoBanner_SVG.svg"></a>
    </div>
    <div class="footer_menu_container">
        <ul>
            <% loop $Menu(1) %>
                    <% if $MenuPosition == "footer" %>
                    <li>
                        <a href="$Link" class="footer_text">$MenuTitle</a>
                    </li>
                    <% end_if %>
            <% end_loop %>
        </ul>
    </div>
</div>
</div>
