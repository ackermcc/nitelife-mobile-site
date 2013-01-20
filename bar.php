<script type="text/javascript">
		$(window).load(function(){
			$(".date-picker td").click(function(){
				$(".date-picker td").removeClass('active-date');
				$(this).addClass('active-date');
			});
		});
</script>


	<div class="content">
		<div class="specials-section">
			<img src="images/specials-flag.png" />
			<div class="specials-date-picker">
				<table class="date-picker" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="active-date">M</td>
						<td>T</td>
						<td>W</td>
						<td>R</td>
						<td>F</td>
						<td>S</td>
						<td>U</td>
					</tr>
				</table>
			</div>
			<div class="specials-viewer">
				<table class="specials-table" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><div class="active-special">1/2 off appetizers</div></td>
						<td><div class="special-time">4pm-6pm</div></td>
					</tr>
					<tr>
						<td><div class="active-special">$1 wells</div></td>
						<td><div class="special-time">7pm-9pm</div></td>
					</tr>
				</table>
			</div>
		</div>
	</div>