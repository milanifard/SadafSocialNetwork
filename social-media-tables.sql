create table sadaf.friend_requests
(
    id          int auto_increment
        primary key,
    from_user   int                                not null,
    to_user     int                                not null,
    status      smallint default 0                 not null,
    last_update datetime default CURRENT_TIMESTAMP not null,
    constraint friend_requests_from_user_to_user_uindex
        unique (from_user, to_user),
    constraint friend_requests_users_id_fk
        foreign key (from_user) references sadaf.users (id)
            on update cascade on delete cascade,
    constraint friend_requests_users_id_fk_2
        foreign key (to_user) references sadaf.users (id)
            on update cascade on delete cascade
);

create table sadaf.messages
(
    id       int auto_increment
        primary key,
    sender   int                                 not null,
    receiver int                                 not null,
    content  text                                not null,
    sent_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint messages_users_id_fk
        foreign key (sender) references sadaf.users (id)
            on update cascade on delete cascade,
    constraint messages_users_id_fk_2
        foreign key (receiver) references sadaf.users (id)
            on update cascade on delete cascade
);

create table sadaf.users
(
    id    int auto_increment
        primary key,
    email varchar(100) not null,
    bio   text         null,
    image mediumblob   null,
    constraint users_email_uindex
        unique (email)
);
