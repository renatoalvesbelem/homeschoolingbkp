<body>
@foreach($questoes as $questao)
    {{$questao->idQuestao}} ) {{$questao->enunciadoQuestao}}
    <br>
    <ol type="a">
        @foreach($questao->opcao as $op)
            <li> {{$op->enunciadoOpcao}} </li>
            <br>
        @endforeach
    </ol>
    <hr/>
@endforeach
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            if ($PAGE_COUNT > 1) {
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $size = 12;
                $pageText = $PAGE_NUM . " de " . $PAGE_COUNT;
                $y = 15;
                $x = 520;
                $pdf->text($x, $y, $pageText, $font, $size);
            }
        ');
    }
</script>
</body>
