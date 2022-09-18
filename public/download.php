<?php

header('Content-disposition: attachment; filename=alunos.csv');

header('Content-type: text/plain');

readfile('alunos.csv');
