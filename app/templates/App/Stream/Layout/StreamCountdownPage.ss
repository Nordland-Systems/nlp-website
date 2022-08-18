<div class="stream_countdown">
    <div class="countdown_text">
        <img class="stream_logo" src="images/NLL-Logo.svg">
        <div class="countdown_middle">
            <div class="countdown_timer">
                <% if $UseNextStream %>
                    <% if $NextStream %>
                        <h1>$NextStream.Title</h1>
                        <h2>startet in etwa</h2>
                        <div class="countdown" data-behaviour="countdown" data-time="$NextStream.Start">
                            <p class="countdown_part" data-behaviour="countdown_hours"></p>
                            <p class="countdown_part" data-behaviour="countdown_minutes"></p>
                            <p class="countdown_part" data-behaviour="countdown_seconds"></p>
                        </div>
                        <p class="countdown_starting_next">Gleich geht es los!</p>
                        <div class="stream_description">$NextStream.Description</div>
                    <% else %>
                        <p class="no_planned_stream">Kein nächster Stream geplant</p>
                    <% end_if %>
                <% else %>
                    <h1>Nächster Stream</h1>
                    <h2>startet in etwa</h2>
                    <div class="countdown" data-behaviour="countdown" data-time="$CountdownDateTime">
                        <p class="countdown_part" data-behaviour="countdown_hours"></p>
                        <p class="countdown_part" data-behaviour="countdown_minutes"></p>
                        <p class="countdown_part" data-behaviour="countdown_seconds"></p>
                    </div>
                    <p class="countdown_starting_next">Gleich geht es los!</p>
                    <div class="stream_description">Seid dabei!</div>
                <% end_if %>

            </div>
            <div class="countdown_chat">
            </div>
        </div>
    </div>
    <div class="countdown_background overlay"></div>
    <div class="countdown_background"><img class="stream_logo" src="images/stream-background/Stars.png"></div>
    <div class="countdown_background">
        <img class="stream_logo" src="images/stream-background/layer_0.png">
        <div class="firework"></div>
        <div class="firework"></div>
        <div class="firework"></div>
        <div class="firework"></div>
    </div>
    <div class="countdown_background"><img class="stream_logo" src="images/stream-background/Stars.png"></div>
    <div class="countdown_background"><img class="stream_logo" src="images/stream-background/layer_1.png"></div>
    <div class="countdown_background"><img class="stream_logo" src="images/stream-background/layer_2.png"></div>
    <div class="countdown_background"><img class="stream_logo" src="images/stream-background/layer_3.png"></div>

    <div class="socials">
        <div class="social_button twitter">
            <img alt="Twitter Logo" src="images/social_media/logo_twitter.png">
            <p>@NordlandPark</p>
        </div>
        <div class="social_button discord">
            <img alt="Discord Logo" src="images/social_media/logo_discord.png">
            <p>discord.gg/V3nCVXn</p>
        </div>
    </div>
</div>
