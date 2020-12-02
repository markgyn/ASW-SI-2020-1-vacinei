package org.ufg.vacinei.dao.repository;

import org.springframework.data.repository.CrudRepository;
import org.ufg.vacinei.model.User;
import java.util.Optional;

public interface UserRepository extends CrudRepository<User, String> {

	public Optional<User> findByUserName(String username);
}
