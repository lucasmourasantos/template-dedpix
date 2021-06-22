CREATE TABLE aluno (
  idaluno INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY(idaluno)
);

CREATE TABLE conteudo_disc (
  idconteudo_disc INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  disciplina_iddisciplina INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR(255)) NULL,
  PRIMARY KEY(idconteudo_disc),
  INDEX conteudo_disc_FKIndex1(disciplina_iddisciplina)
);

CREATE TABLE disciplina (
  iddisciplina INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  professor_idprofessor INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR(255) NULL,
  PRIMARY KEY(iddisciplina),
  INDEX disciplina_FKIndex1(professor_idprofessor)
);

CREATE TABLE frequencia (
  aluno_idaluno INTEGER UNSIGNED NOT NULL,
  turma_idturma INTEGER UNSIGNED NOT NULL,
  date DATE NULL,
  PRIMARY KEY(aluno_idaluno, turma_idturma),
  INDEX aluno_has_turma_FKIndex1(aluno_idaluno),
  INDEX aluno_has_turma_FKIndex2(turma_idturma)
);

CREATE TABLE instituicao (
  idinstituicao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  endereco VARCHAR(255) NULL,
  PRIMARY KEY(idinstituicao)
);

CREATE TABLE notas (
  aluno_idaluno INTEGER UNSIGNED NOT NULL,
  disciplina_iddisciplina INTEGER UNSIGNED NOT NULL,
  nota FLOAT NULL,
  PRIMARY KEY(aluno_idaluno, disciplina_iddisciplina),
  INDEX aluno_has_disciplina_FKIndex1(aluno_idaluno),
  INDEX aluno_has_disciplina_FKIndex2(disciplina_iddisciplina)
);

CREATE TABLE professor (
  idprofessor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY(idprofessor)
);

CREATE TABLE turma (
  idturma INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  professor_idprofessor INTEGER UNSIGNED NOT NULL,
  instituicao_idinstituicao INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR(255) NULL,
  tipo VARCHAR(255) NULL,
  PRIMARY KEY(idturma),
  INDEX turma_FKIndex1(instituicao_idinstituicao),
  INDEX turma_FKIndex2(professor_idprofessor)
);


