{literal}
<script type="text/javascript" charset="utf-8">
    $(function()
    {
        $('.date-pick').datepicker(
          {dateFormat:'mm/dd/yy',
          onSelect: function(dateText, instance) {
            if (this == $('#pick_in')[0]) {
              setTimeframe(new Date(dateText),undefined);
            }
            if (this == $('#pick_out')[0]) {
              setTimeframe(undefined,new Date(dateText));
            }
          }
        });
        
        setTimeframeStart(new Date({/literal}{$timeframeBegin*1000}{literal}));
        setTimeframeEnd(new Date({/literal}{$timeframe_out*1000}{literal}));
        updateTimeframeWarning();
             
    });
</script>
{/literal}


<div id="dates">
        <input type="hidden" id="pick_in" class="date-pick"/>
        <a href="#" id="ts_in" onClick="$('#pick_in').datepicker('show');return false"></a> - 
        <input type="hidden" id="pick_out" class="date-pick"/>
        <a href="#" id="ts_out" onClick="$('#pick_out').datepicker('show');return false"></a>
</div>


<div id="infos">
    <span id="n_date"></span> &nbsp; 
    <img src="../skins/{$kga.conf.skin|escape:'html'}/grfx/g3_display_smallclock.png" width="13" height="13" alt="Display Smallclock" />
    <span id="n_uhr">00:00</span> &nbsp; 
    <img src="../skins/{$kga.conf.skin|escape:'html'}/grfx/g3_display_eye.png" width="15" height="12" alt="Display Eye" /> 
    <strong id="display_total">{$total}</strong> 
</div>
