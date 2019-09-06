<div class="navbar fixed-bottom main-bgnd p-0 m-0">
            <ul id="marquee" class="p-0 m-0">
                <li>
                    <?php if(isset($locNws[0]) & isset($locNws[1]) & isset($locNws[2])):?>
                        <a href="<?= site_url('/posts/read/' .$locNws[0]['id'])?>" class="text-white">
                        News: <?=$locNws[0]['News_Title'] ?> &#9898;
                        </a>
                        <a href="<?= site_url('/posts/read/' .$locNws[1]['id'])?>" class="text-white">
                        News: <?=$locNws[1]['News_Title'] ?> &#9898;
                        </a>
                    <?php endif; ?>
                    <?php if(isset($intNws[0]) & isset($intNws[1])):?>
                        <a href="<?= site_url('/posts/read/' .$intNws[0]['id'])?>" class="text-white">
                        Foreign: <?=$intNws[0]['News_Title'] ?> &#9898;
                        </a>
                        <a href="<?= site_url('/posts/read/' .$intNws[1]['id'])?>" class="text-white">
                        Foreign: <?=$intNws[1]['News_Title'] ?> &#9898;
                        </a>
                    <?php endif ?>
                    <?php if(isset($locPol[0]) & isset($locPol[1])):?>
                        <a href="<?= site_url('/posts/read/' .$locPol[0]['id'])?>" class="text-white">
                        Politics: <?=$locPol[0]['News_Title'] ?> &#9898;
                        </a>
                        <a href="<?= site_url('/posts/read/' .$locPol[1]['id'])?>" class="text-white">
                        Politics: <?=$locPol[1]['News_Title'] ?> &#9898;
                        </a>
                    <?php endif ?>
                    <?php if(isset($locBus[0])):?>
                        <a href="<?= site_url('/posts/read/' .$locBus[0]['id'])?>" class="text-white">
                        Business: <?=$locBus[0]['News_Title'] ?> &#9898;
                        </a>
                    <?php endif ?>
                    <?php if(isset($locHlth[0])):?>
                        <a href="<?= site_url('/posts/read/' .$locHlth[0]['id'])?>" class="text-white">
                        Health: <?=$locHlth[0]['News_Title'] ?> &#9898;
                        </a>
                    <?php endif ?>
                    <?php if(isset($locSprt[0]) & isset($locSprt[1])):?>
                        <a href="<?= site_url('/posts/read/' .$locSprt[0]['id'])?>" class="text-white">
                        Sport: <?=$locSprt[0]['News_Title'] ?> &#9898;
                        </a>
                        <a href="<?= site_url('/posts/read/' .$locSprt[1]['id'])?>" class="text-white">
                        Sport: <?=$locSprt[1]['News_Title'] ?> &#9898;
                        </a>
                    <?php endif ?>
                    <?php if(isset($locEnt[0]) & isset($locEnt[1])):?>
                        <a href="<?= site_url('/posts/read/' .$locEnt[0]['id'])?>" class="text-white">
                        Entertainment: <?=$locEnt[0]['News_Title'] ?> &#9898;
                        </a>
                        <a href="<?= site_url('/posts/read/' .$locEnt[1]['id'])?>" class="text-white">
                        Entertainment: <?=$locEnt[1]['News_Title'] ?> &#9898;
                        </a>
                    <?php endif ?>
                </li>
            </ul>
        </div>