<?php $this->beginContent('//layouts/main'); ?>
    <div class="main-column-left-content">
        <?php echo $content; ?>
    </div>

    <div class="main-column-right-sidebar">
        <?php if (!Yii::app()->user->isGuest): ?>
            <div class="sidebar-block">
                <div class="sidebar-block-title"><?php echo Yii::app()->user->model->name; ?></div>
                <div class="sidebar-block-content">
                        Баланс: <?php echo Yii::app()->user->model->balance; ?> руб <a href="#">пополнить</a>
                        
                    <ul style="margin-top: 10px;">
                        <li>
                            <a href="/page/test">Счета</a>
                        </li>

                        <li>
                            <a href="/page/kontakty">Серверы</a>
                        </li>

                        <li>
                            <a href="#">Тикеты (0)</a>
                        </li>
                        <li>
                            <a href="/">Управление профилем</a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="sidebar-block">
            <div class="sidebar-block-title">Меню</div>
            <div class="sidebar-block-content">
                <ul>
                    <li>
                        <a href="/">Главная страница</a>
                    </li>
                    
                    <li>
                        <a href="/page/test">Тестовые серверы</a>
                    </li>
                    
                    <li>
                        <a href="/page/kontakty">Контакты</a>
                    </li>
                    
                    <li>
                        <a href="/">О проекте</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="sidebar-block">
            <div class="sidebar-block-title">Способы оплаты</div>
            <div class="sidebar-block-content">
                <center>
                    <img src="http://www.robokassa.ru/Images/Mastercard.gif"/>
                    <img src="http://www.robokassa.ru/Images/Visa.gif"/>
                    <img src="http://www.robokassa.ru/Images/YandexMoney.gif"/>
                    <img src="http://www.robokassa.ru/Images/TerminalsQiwi.gif" style="margin-top: 5px;"/>
                    <img src="http://www.robokassa.ru/Images/AlfaBank.gif" style="margin-top: 5px;"/>
                    <img src="http://www.robokassa.ru/Images/RBKMoney.gif" style="margin-top: 5px;"/>
                </center>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>