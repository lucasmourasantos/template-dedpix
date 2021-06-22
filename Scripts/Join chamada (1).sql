SELECT p.nome AS Professor, d.descricao AS Disciplina, i.nome AS Instituição FROM disciplina d 
JOIN professor p ON d.iddisciplina=p.disciplina_iddisciplina 
JOIN instituicao i on i.idinstituicao=p.instituicao_idinstituicao 
WHERE p.nome LIKE '%LUCCA%'

SELECT d.descricao AS Disciplina, p.nome AS Professor, i.nome AS Instituição, t.descricao AS Turma FROM disciplina d 
JOIN professor p ON d.iddisciplina=p.disciplina_iddisciplina 
JOIN instituicao i on i.idinstituicao=p.instituicao_idinstituicao 
LEFT JOIN turma t ON p.idprofessor=t.professor_idprofessor 
WHERE p.nome LIKE '%LUCCA%'