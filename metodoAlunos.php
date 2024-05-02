<?php
                function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros,){
                  $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
                  $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
                  $nu = "0123456789"; // $nu contem os números
                
                  if ($maiusculas){
                        $senha .= str_shuffle($ma);
                  }
                
                    if ($minusculas){
                        $senha .= str_shuffle($mi);
                    }
                
                    if ($numeros){
                        $senha .= str_shuffle($nu);
                    }            
                    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
                    return substr(str_shuffle($senha),0,$tamanho);
                }
                if()
                ?>