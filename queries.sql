use inggerar_santuario;
show tables;
Select * from users;
Select * from horarios;

Select * from avisos;

SELECT avisos.id, avisos.titulo, avisos.aviso , avisos.created_at, avisos.updated_at FROM avisos WHERE state = '1' ORDER BY avisos.updated_at DESC;