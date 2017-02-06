<div class="paginare">
    @if($paginare>1)
        <ul class="pagination">  
            @if($paginare>7)
                @if($curentpage>3)
                    @if($curentpage+3<=$paginare)
                        <?php
                            $start=$curentpage-3;
                            $end=$curentpage+3;
                        ?>
                    @else
                        <?php   
                            $start=$paginare-6;
                            $end=$paginare;
                        ?>
                    @endif
                @else
                    <?php  
                        $start=1;
                        $end=7;
                    ?>
                @endif
            @else
                <?php  
                    $start=1;
                    $end=$paginare;
                ?>
            @endif
            <li>
                <a href="{{URL("page=1")}}">
                    <span class="glyphicon glyphicon-backward"></span>
                </a>
            </li>
            @for($i=$start;$i<=$end;$i++)
                @if($i==$curentpage)
                    <li class="active">
                        <a href="{{URL("page=".$i)}}">
                            {{$i}}
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{URL("page=".$i)}}">
                            {{$i}}
                        </a>
                    </li>
                @endif
            @endfor
            <li>
                <a href="{{URL("page=".$paginare)}}">
                    <span class="glyphicon glyphicon-forward"></span>
                </a>
            </li>
        </ul>
    @endif
</div>