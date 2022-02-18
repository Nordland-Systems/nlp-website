<section class="section section--notice $Variant">
    <div class="section_content">
        <div class="section_content_inner">
            <% if $ShowTitle %>
                <h2 class="inner_title">$Title</h2>
            <% end_if %>
            <p>$Text</p>
            <% if $ButtonText && $ButtonLink %>
                <a href="$ButtonLink" class="inner_button readmore">$ButtonText</a>
            <% end_if %>
        </div>

        <% if $Image %>
            <div class="section_content_icon">
                <span class="icon_mask" style="mask-image: url('$Image.Url'); -webkit-mask-image: url('$Image.Url');"></span>
            </div>
        <% end_if %>
    </div>
</section>
