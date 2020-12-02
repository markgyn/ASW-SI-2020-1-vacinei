package org.ufg.vacinei.service.auth;

import org.springframework.context.annotation.Bean;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.password.NoOpPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;
import org.ufg.vacinei.auth.UserPrincipal;
import org.ufg.vacinei.dao.repository.UserRepository;
import org.ufg.vacinei.model.User;
import java.util.Optional;

@Service
public class DatabaseUserDetailsService implements UserDetailsService {
	
	private final UserRepository userRepository;
	
	public DatabaseUserDetailsService(UserRepository userRepository) {
		this.userRepository = userRepository;
	}
	
	@Override
	public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
		Optional<User> userOptional = userRepository.findByUserName(username);
		if (userOptional.isPresent()) {
			User user = userOptional.get();
			return new UserPrincipal(user.getUserName(), user.getPassword());
		} else {
			throw new UsernameNotFoundException("User not found");
		}
	}
	
	@Bean
	public PasswordEncoder passwordEncoder() {
		return NoOpPasswordEncoder.getInstance();
	}
	
}
