<ul class="links">
    <li>
        <!-- ！！！请保留此项！！！ -->
        <section class="item blue">
            <section class="title">
                <a href="//laolion.com" target="_blank">老狮的梦</a>
            </section>
            <section class="content">
                <section class="desc">一只游走在广袤无垠的草原老狮</section>
                <img src="//laolion.com/img/ico.png" />
            </section>
        </section>
    </li>
    <?php if ($this->options->JFriends) : ?>
        <?php
        if (strpos($this->options->JFriends, '||') !== false) {
            $list = "";
            $color = ["deepgrey", "blue", "purple", "green", "yellow", "red", "orange", "success", "warning", "danger", "info"];
            $txt = $this->options->JFriends;
            $string_arr = explode("\r\n", $txt);
            $long = count($string_arr);
            for ($i = 0; $i < $long; $i++) {
                $list = $list . '<li><div class="item ' . $color[rand(0, 10)] . '"><div class="title"><a target="_blank" href="' . explode("||", $string_arr[$i])[1] . '">' . explode("||", $string_arr[$i])[0] . '</a></div><div class="content"><div class="desc">' . explode("||", $string_arr[$i])[3] . '</div><img src="' . explode("||", $string_arr[$i])[2] . '" /></div></div></li>';
            }
            echo $list;
        }
        ?>
    <?php endif; ?>
</ul>