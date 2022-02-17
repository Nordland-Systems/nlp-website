<section class="section section--space" style="height: {$Height}px" >
    <% if $Variant=="style--line" %>
        <span class="section_line"></span>
    <% else_if $Variant=="style--wave" %>
        <div class="section_waves">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
    <% else_if $Variant=="style--diamond" %>
        <div class="section_diamond">
            <span class="section_diamond_line"></span>
            <span class="section_diamond_inner"></span>
            <span class="section_diamond_line"></span>
        </div>
    <% end_if %>
</section>
